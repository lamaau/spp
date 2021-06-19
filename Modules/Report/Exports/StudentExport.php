<?php

namespace Modules\Report\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Modules\Master\Constants\SexConstant;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Modules\Master\Constants\StudentConstant;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Modules\Master\Constants\ReligionConstant;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Modules\Setting\Repository\SettingRepository;

class StudentExport implements FromView, WithDrawings, WithEvents, ShouldAutoSize
{
    use Exportable;

    protected object $rows;
    protected $setting;

    public function __construct(object $rows)
    {
        $this->rows = $rows;
        $this->setting = resolve(SettingRepository::class)->general();
    }

    public function view(): View
    {
        return view('report::student.excel', [
            'rows' => $this->rows,
        ]);
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path("storage/".$this->setting->logo));
        $drawing->setHeight(120);
        $drawing->setCoordinates('C2');
        $drawing->setOffsetX(13);
        $drawing->setOffsetY(8);

        return $drawing;
    }

    public function registerEvents(): array
    {
        $info = $this->setting->name . "\n" . $this->setting->address . "\n" . "Tlp: {$this->setting->phone} Fax: {$this->setting->fax} Email: {$this->setting->email}";

        return [
            AfterSheet::class => function (AfterSheet $event) use ($info) {
                $cellsHeading = 'D2:H8';

                $event->sheet->autoSize(true);
                $event->sheet->mergeCells('C2:C8');
                $event->sheet->mergeCells($cellsHeading);
                $event->sheet->setCellValue('D2', $info);
                // Set cells Heading range to wrap text in cells
                $event->sheet->getDelegate()->getStyle($cellsHeading)->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle($cellsHeading)->getFont()->setSize(16);
                $event->sheet->getDelegate()->getStyle($cellsHeading)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
                $event->sheet->getDelegate()->getStyle($cellsHeading)->getAlignment()->setHorizontal(Alignment::VERTICAL_CENTER);
            },
        ];
    }
}
