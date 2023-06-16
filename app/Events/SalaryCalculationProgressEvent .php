<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SalaryCalculationProgressEvent
{
 use Dispatchable, SerializesModels;

 public $progress;

 /**
  * Create a new event instance.
  *
  * @param int $progress
  */
 public function __construct($progress)
 {
  $this->progress = $progress;
 }
}
