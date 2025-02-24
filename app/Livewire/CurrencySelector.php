<?php

namespace App\Livewire;

use App\Services\CurrencyDetectorService;
use Livewire\Component;

class CurrencySelector extends Component
{
    public ?array $currencyDetails = null;
    public string $message = '';

    public function mount(CurrencyDetectorService $detector)
    {
        $ipAddress = request()->ip();
        $this->currencyDetails = $detector->detectCurrencyFromIp($ipAddress);

        if (!$this->currencyDetails) {
            $this->message = 'Unable to detect currency for your location.';
        }
    }

    public function render()
    {
        return view('livewire.currency-selector');
    }
}
