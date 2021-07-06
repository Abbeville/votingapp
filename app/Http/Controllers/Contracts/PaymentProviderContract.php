<?php

namespace App\Http\Controllers\Contracts;

use Illuminate\Http\Request;

interface PaymentProviderContract {

	public function initialize(Request $request);

	public function callback();
}