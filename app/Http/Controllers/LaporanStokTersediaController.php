<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GreenDekor;
use DataTables; 
use DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class LaporanStokTersediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $sql = "SELECT ta.nama_barang, ta.nama_latin, tb.nama_kategori, tc.nama_indukKategori jenis_barang FROM barang ta LEFT JOIN kategori tb ON ta.id_kategori = tb.id_kategori LEFT JOIN induk_kategori tc ON ta.id_induk = tc.id_indukKategori WHERE ta.status is null";
            $data = DB::select($sql);
            return DataTables::of($data)  
            ->addIndexColumn()
            ->make(true);
        }
        return view('layouts.admin.laporan-stok-tersedia.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    public function toExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Barang');
        $sheet->setCellValue('C1', 'Nama Latin');
        $sheet->setCellValue('D1', 'Kategori');
        $sheet->setCellValue('E1', 'Jenis Barang');
        $sql = "SELECT ta.nama_barang, ta.nama_latin, tb.nama_kategori, tc.nama_indukKategori jenis_barang FROM barang ta LEFT JOIN kategori tb ON ta.id_kategori = tb.id_kategori LEFT JOIN induk_kategori tc ON ta.id_induk = tc.id_indukKategori WHERE ta.status is null";
        $data = DB::select($sql);
        $cell = 2;
        $no = 1;
        // printJSON($data);
        foreach($data as $row){
            $sheet->setCellValue('A'.$cell, $no++);
            $sheet->setCellValue('B'.$cell, $row->nama_barang);
            $sheet->setCellValue('C'.$cell, $row->nama_latin);
            $sheet->setCellValue('D'.$cell, $row->nama_kategori);
            $sheet->setCellValue('E'.$cell, $row->jenis_barang);
            $cell++;
        }
        $styleArray = array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ),

            ),
        );
        $styleHeader = array(
            'alignment' => array(
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ),
        );
        $stylesBoldHeader = array(
            'alignment' => array(
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ),
            'font'  => array(
                'bold' => true,
                'size'  => 15,
            )
        );
        $endCeel = 'E';
            foreach (range('A', $endCeel) as $columnID) {
				$sheet->getColumnDimension($columnID)
				->setAutoSize(true);
            }
        $sheet->getStyle('A1:E1')->applyFromArray($styleHeader);
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename=laporan-stok-tersedia.xlsx');
        $writer->save('php://output');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
