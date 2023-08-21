<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'assetManagement' => [
        'title'          => 'Asset management',
        'title_singular' => 'Asset management',
    ],
    'permission'     => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'           => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
            'team'                     => 'Team',
            'team_helper'              => '',
        ],
    ],
    'asset'         => [
        'title'          => 'Isotopes',
        'title_singular' => 'Isotope',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'name'               => 'Name',
            'name_helper'        => '',
            'description'        => 'Description',
            'description_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'team'           => [
        'title'          => 'Teams',
        'title_singular' => 'Team',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
            'name'              => 'Name',
            'name_helper'       => '',
        ],
    ],
    'hospital'           => [
        'title'          => 'Hospitals',
        'title_singular' => 'Hospital',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'address'           => 'Address',
            'address_helper'    => '',
            'license_no'        => 'License No',
            'license_no_helper' => '',
            'expiry'            => 'Expiry',
            'expiry_helper'     => '',
            'rhso'              => 'RPO',
            'rhso_helper'       => '',
            'rep'               => 'BIR Name',
            'rep_helper'        => '',
            'created_by'        => 'Created By',
            'created_by_helper' => '',
            'date'              => 'Date',
            'date_helper'       => '',
            'contact_no'        => 'Contact No',
            'contact_no_helper' => '',
            'airline'           => 'Airline',
            'airline_helper'    => '',
            'airline_etd'       => 'Airline ETD',
            'airline_etd_helper'=> '',
            'airline_eta'       => 'Airline ETA',
            'airline_eta_helper'=> '',
            'vessel'            => 'Vessel',
            'vessel_helper'     => '',
            'vessel_etd'        => 'Vessel ETD',
            'vessel_etd_helper' => '',
            'vessel_eta'        => 'Vessel ETA',
            'vessel_eta_helper' => '',
            'stowage'           => 'Stowage',
            'stowage_helper'    => '',
            'rigging'           => 'Rigging',
            'rigging_helper'          => '',
            'placards'                => 'Placards',
            'placards_helper'         => '',
            'vehicle'           => 'Vehicle',
            'vehicle_helper'    => '',
            'vehicle_plate'           => 'Vehicle Plate',
            'vehicle_plate_helper'    => '',
            'vehicle_etd'             => 'Vehicle ETD',
            'vehicle_etd_helper'      => '',
            'vehicle_eta'             => 'Vehicle ETA',
            'vehicle_eta_helper'      => '',
            'forwarder'               => 'Forwarder',
            'forwarder_helper'        => '',
            'forwarder_plate'         => 'Forwarder Plate',
            'forwarder_plate_helper'  => '',
            'forwarder_etd'           => 'Forwarder ETD',
            'forwarder_etd_helper'    => '',
            'forwarder_eta'           => 'Forwarder ETA',
            'forwarder_eta_helper'    => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
        ],
    ],
    'stock'          => [
        'title'          => 'Products',
        'title_singular' => 'Product',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => '',
            'asset'                => 'Asset',
            'asset_helper'         => '',
            'current_stock'        => 'Price',
            'current_stock_helper' => '',
            'created_at'           => 'Created at',
            'created_at_helper'    => '',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => '',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => '',
            'team'                 => 'Team',
            'team_helper'          => '',
        ],
    ],
    'production'           => [
        'title'          => 'Productions',
        'title_singular' => 'Production',
    ],
    'drsi'           => [
        'title'          => 'DR/SI',
        'title_singular' => 'DR/SI',
    ],
    'transaction'    => [
        'order_title'               => 'Orders',
        'order_title_singular'      => 'Order',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => '',
            'hospital'              => 'Hospital',
            'hospital_helper'       => '',
            'user'              => 'Created by',
            'user_helper'       => '',
            'remarks'                => 'Remarks',
            'remarks_helper'         => '',
            'cancel'                => 'Cancel',
            'cancel_helper'         => '',
            'status'                => 'Status',
            'status_helper'         => '',
            'kitprep'                => 'Kit Prep',
            'kitprep_helper'         => '',
            'calibration_date'      => 'Calibration Date/Time',
            'calibration_date_helper'    => '',
            'expiry_date'           => 'Expiry Date/Time',
            'expiry_date_helper'    => '',
            'dispense_date'           => 'Dispense Date/Time',
            'dispense_date_helper'    => '',
            'rx_number'             => 'RX Number',
            'rx_number_helper'      => '',
            'actual'                => 'Actual Mci/Dose',
            'actual_helper'         => '',
            'asset'                 => 'Isotope',
            'asset_helper'          => '',
            'ofm'                   => 'Order Form #',
            'ofm_helper'            => '',
            'asset_product'         => 'Unit',
            'asset_product_helper'  => '',
            'product_activity'      => 'Activity',
            'product_activity_helper'      => '',
            'activity_mci'          => 'Activity mCi',
            'activity_mci_helper'      => '',
            'activity_mbq'          => 'MBq',
            'activity_mbq_helper'      => '',
            'discrepancy'           => '10%',
            'discrepancy_helper'    => '',
            'particular'            => 'Particular',
            'particular_helper'     => '',
            'leadpot'               => 'Lead Pot',
            'leadpot_helper'        => '',
            'patient'               => 'Patient',
            'patient_helper'        => '',
            'lot_no'                => 'Lot #',
            'lot_no_helper'         => '',
            'date_dispensed'        => 'Date Dispensed',
            'date_dispensed_helper' => '',
            'max_doserate'          => 'Max|@1m Doserate',
            'max_doserate_helper'   => '',
            'doserate_meter'        => 'Doserate @ 1m',
            'doserate_meter_helper' => '',
            'procedure'                => 'Procedure',
            'procedure_helper'         => '',
            'volume'                => 'Volume',
            'volume_helper'         => '',
            'run_no'                => 'Run #',
            'run_no_helper'         => '',
            'can'                   => 'Packaging',
            'can_helper'            => '',
            'dimension'             => 'Dimension',
            'dimension_helper'      => '',
            'performed_by'          => 'Performed by',
            'performed_by_helper'   => '',
            'transport_index'       => 'Transport Index',
            'transport_index_helper'=> '',
            'dr'                    => 'DR',
            'dr_helper'             => '',
            'si'                    => 'SI',
            'si_helper'             => '',
            'price'                 => 'Price',
            'price_helper'          => '',
            'created_at'            => 'Created at',
            'created_at_helper'     => '',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => '',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => '',
        ],
    ],
];
