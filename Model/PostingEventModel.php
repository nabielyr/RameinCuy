<?php

class PostingEventModel {
    public function getEvent($id) {
        return [
            'id' => $id,
            'title' => 'Event Title',
            'description' => 'Event Description',
        ];
    }

    public function deleteEvent($id) {
        echo "Event with ID $id deleted.";
    }
}