<?php

namespace App\Console\Commands;

use App\Models\Food;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class LoadFoodDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'foods:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load the MEXT food database';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $url = 'https://www.mext.go.jp/content/20201225-mxt_kagsei-mext_01110_012.xlsx';
        $filename = basename($url);

        if (Storage::missing($filename)) {
            $this->output->info('Downloading...');
            Storage::put($filename, file_get_contents($url));
        }

        $reader = new Xlsx;
        $reader->setLoadSheetsOnly('表全体');

        $this->output->info('Reading the file...');
        $spreadsheet = $reader->load(Storage::path($filename));

        $spreadsheet->setActiveSheetIndex(0);
        $worksheet = $spreadsheet->getActiveSheet();
        $keys = collect(['number', 'index', 'name', 'REFUSE', 'ENERC', 'ENERC_KCAL', 'WATER', 'PROTCAA', 'PROT-', 'FATNLEA', 'CHOLE', 'FAT-', 'CHOAVLM', 'ENERC_from_CHOAVLM', 'CHOAVL', 'CHOAVLDF-', 'ENERC_from_CHOAVLDF-', 'FIB-', 'POLYL', 'CHOCDF-', 'OA', 'ASH', 'NA', 'K', 'CA', 'MG', 'P', 'FE', 'ZN', 'CU', 'MN', 'ID', 'SE', 'CR', 'MO', 'RETOL', 'CARTA', 'CARTB', 'CRYPXB', 'CARTBEQ', 'VITA_RAE', 'VITD', 'TOCPHA', 'TOCPHB', 'TOCPHG', 'TOCPHD', 'VITK ', 'THIA', 'RIBF', 'NIA', 'NE', 'VITB6A', 'VITB12', 'FOL', 'PANTAC', 'BIOT', 'VITC', 'ALC', 'NACL_EQ', 'comment']);
        $startRow = 13;

        $this->output->info('Loading the data...');
        $this->output->progressStart($worksheet->getHighestRow() - $startRow);

        foreach ($worksheet->getRowIterator($startRow) as $row) {
            $cellIterator = $row->getCellIterator(startColumn: 'B', endColumn: 'BJ');

            $cells = collect($cellIterator)
                ->map(fn ($cell) => $cell->getValue())
                ->map(fn ($cell) => preg_replace('/(Tr|-)/', 0, $cell)) // treat trace amount or an unanalyzed value as zero
                ->map(fn ($cell) => preg_replace('/\((.+)\)/', '\1', $cell)); // remove parentheses of an estimated value
            $cells->pull('AG'); // remove an empty column

            $data = $keys->combine($cells);

            $food = new Food;

            $food->name = $data['name'];
            $food->default_quantity = 100;
            $food->default_unit = 'g';
            $food->calories = $data['ENERC_KCAL'];
            $food->protein = $data['PROT-'];
            $food->fat = $data['FAT-'];
            $food->carbs = $data['CHOCDF-'];
            $food->salt = $data['NACL_EQ'];

            $food->save();

            $this->output->progressAdvance();
        }

        $this->output->progressFinish();
    }
}
