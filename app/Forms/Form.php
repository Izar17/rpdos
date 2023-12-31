<?php
namespace App;

    if ($request->rx_number != '') {
        $transactions = Transaction::where("rx_no", $request->rx_number)
        ->where("asset_id", $request->asset_id)->get();
    } else {
        switch (true) {
            case $request->hospital_id != '' && $request->run_no != '' && ($request->startDate != '' || $request->endDate !=''):
                $transactions = Transaction::where("hospital_id", $request->hospital_id)
                    ->where("run_no", $request->run_no)
                    ->where("asset_id", $request->asset_id)
                    ->whereBetween("calibration_date", [$request->startDate, $request->endDate])
                    ->get();
                break;

            case $request->hospital_id != '' && $request->run_no != '' && ($request->startDate == '' || $request->endDate ==''):
                $transactions = Transaction::where("hospital_id", $request->hospital_id)
                    ->where("asset_id", $request->asset_id)
                    ->where("run_no", $request->run_no)
                    ->get();
                break;

            case $request->hospital_id != '' && $request->run_no == '' && ($request->startDate != '' || $request->endDate !=''):
                $transactions = Transaction::where("hospital_id", $request->hospital_id)
                    ->where("asset_id", $request->asset_id)
                    ->whereBetween("calibration_date", [$request->startDate, $request->endDate])
                    ->get();
                break;

            case $request->hospital_id == '' && $request->run_no != '' && ($request->startDate != '' || $request->endDate !=''):
                $transactions = Transaction::where("run_no", $request->run_no)
                    ->where("asset_id", $request->asset_id)
                    ->whereBetween("calibration_date", [$request->startDate, $request->endDate])
                    ->get();
                break;

            case $request->hospital_id == '' && $request->run_no == '' && ($request->startDate != '' || $request->endDate !=''):
                $transactions = Transaction::where("asset_id", $request->asset_id)
                    ->whereBetween("calibration_date", [$request->startDate, $request->endDate])
                    ->get();
                break;

            case $request->hospital_id != '' && $request->run_no == '' && ($request->startDate == '' || $request->endDate ==''):
                $transactions = Transaction::where("hospital_id", $request->hospital_id)
                ->where("asset_id", $request->asset_id)->get();
                break;

            default:
                $transactions = Transaction::where("asset_id", $request->asset_id)->get();
                break;
        }
    }
?>
