<?php

namespace App\Exports;

use App\CategoryProductModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExcelExports implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CategoryProductModel::all();
    }
    public function headings() :array {
    	return ["ID", "Keywords", "Tên Danh Mục", "Slug", "Mô Tả Danh Mục", "Status"];
    }
}
