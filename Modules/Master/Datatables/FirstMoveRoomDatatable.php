<?php

namespace Modules\Master\Datatables;

use App\Datatables\Column;
use App\Datatables\Traits\Notify;
use App\Datatables\TableComponent;
use Modules\Master\Entities\Student;
use App\Datatables\Traits\HtmlComponents;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Event;

class FirstMoveRoomDatatable extends TableComponent
{
    use HtmlComponents,
        Notify;

    /** @var array event listener */
    protected $listeners = [
        'down:student' => 'down',
        'fresh:table' => 'refresh',
    ];

    /** @var object */
    public $rooms;

    /** @var string */
    public $room;
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $cardHeaderAction = "master::student.room.first";

    /**
     * Reload table
     *
     * @return void
     */
    public function refresh(): void
    {
        $this->resetCheckbox();
    }

    /**
     * Move student
     *
     * @return Event
     */
    public function up(): Event
    {
        return $this->emit('up:student', $this->room, $this->checkbox_values);
    }

    /**
     * Move student
     *
     * @param string $fromRoom
     * @param array $studentIds
     * @return Event
     */
    public function down(string $fromRoom, array $studentIds): Event
    {
        if (is_null($this->room)) {
            return $this->warning('Oops!', 'Pilih kelas tujuan terlebih dahulu.');
        }

        if ($fromRoom === $this->room) {
            return $this->warning('Oops!', 'Kelas sebelumnya tidak boleh sama dengan kelas tujuan.');
        }

        $students = Student::whereIn('id', $studentIds)->whereNotIn('room_id', [$this->room])->get();

        if (!$students) {
            return $this->error('Oops!', 'Siswa tidak ditemukan.');
        }

        $students->each(function ($query) {
            $query->update([
                'room_id' => $this->room,
            ]);
        });

        $this->emit('fresh:table');
        return $this->success('Berhasil!', 'Kelas siswa berhasil diubah.');
    }

    public function query(): Builder
    {
        return Student::query()->where('room_id', $this->room);
    }

    public function columns(): array
    {
        return [
            Column::make('checkbox'),
            Column::make('nama', 'name')->sortable()->searchable(),
        ];
    }
}
