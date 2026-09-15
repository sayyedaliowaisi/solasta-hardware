<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     */
    protected $description = 'Create a new administrator account securely';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Create Admin Account');
        $this->newLine();

        // Name
        $name = trim((string) $this->ask('Admin name'));

        // Email
        $email = strtolower(trim((string) $this->ask('Admin email')));

        // Validate name + email before asking for password
        $validator = Validator::make(
            [
                'name' => $name,
                'email' => $email,
            ],
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    'unique:admins,email',
                ],
            ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        // Password is hidden while typing
        $password = (string) $this->secret('Admin password');

        $passwordConfirmation = (string) $this->secret(
            'Confirm admin password'
        );

        if ($password !== $passwordConfirmation) {
            $this->error('Passwords do not match.');

            return self::FAILURE;
        }

        $passwordValidator = Validator::make(
            ['password' => $password],
            [
                'password' => [
                    'required',
                    'string',
                    'min:12',
                ],
            ]
        );

        if ($passwordValidator->fails()) {
            foreach ($passwordValidator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        Admin::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->newLine();
        $this->info('Admin account created successfully.');

        return self::SUCCESS;
    }
}