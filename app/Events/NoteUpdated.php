<?php

namespace App\Events;

use App\Models\Note;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NoteUpdated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Note $note;

    public function __construct(Note $note)
    {
        $this->note = $note;
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('notes'),
        ];
    }

    public function broadcastAs(): string
    {
        return 'note.updated';
    }

    public function update(Request $request, Note $note)
    {
        dd($request->all());
    }
}