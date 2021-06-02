<?php

namespace App\Services;

class XlsxConverter
{
    /** @var string */
    protected $path;

    /** @var \SplFileInfo */
    protected $document;

    public function __construct(string $path)
    {
        $this->path = $path;
        $this->document = new \SplFileInfo($path);
    }

    /**
     * Convert to xlsx
     *
     * @return string|null
     */
    public function convert(): ?string
    {
        switch ($this->document->getExtension()) {
            case 'ods':
                return $this->fromOds();
                break;
            case 'xls':
                return $this->fromXls();
                break;
            case 'xlsx':
                return $this->path;
            default:
                return null;
        }
    }

    /**
     * To xlsx from csv
     *
     * @return string
     */
    public function fromCsv(): string
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        $spreadsheet = $reader->load($this->document);

        return $this->writer($spreadsheet);
    }

    /**
     * To xlsx from ods
     *
     * @return string
     */
    public function fromOds(): string
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Ods();
        $spreadsheet = $reader->load($this->document);

        return $this->writer($spreadsheet);
    }

    /**
     * To xlsx from xls
     *
     * @return string
     */
    public function fromXls(): string
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        $spreadsheet = $reader->load($this->document);

        return $this->writer($spreadsheet);
    }

    /**
     * Write to xlsx
     *
     * @param object $spreadsheet
     * @return string
     */
    protected function writer(object $spreadsheet): string
    {
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

        $filename = "uploads/imports/" . generate_document_name('xlsx', 'document_converted', 'uploads/imports');
        $fullname = uploaded_path($filename);
        $writer->save($fullname);

        return $filename;
    }
}
