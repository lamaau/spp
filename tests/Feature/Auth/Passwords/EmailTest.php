<?php

namespace Tests\Feature\Auth\Passwords;

use Tests\TestCase;
use Livewire\Livewire;
use Modules\Master\Entities\User;
use Modules\Setting\Entities\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmailTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_view_password_request_page()
    {
        $this->get(route('password.request'))
            ->assertSuccessful()
            ->assertSeeLivewire('auth.passwords.email');
    }

    /** @test */
    public function a_user_must_enter_an_email_address()
    {
        Livewire::test('auth.passwords.email')
            ->call('sendResetPasswordLink')
            ->assertHasErrors(['email' => 'required']);
    }

    /** @test */
    public function a_user_must_enter_a_valid_email_address()
    {
        Livewire::test('auth.passwords.email')
            ->set('email', 'email')
            ->call('sendResetPasswordLink')
            ->assertHasErrors(['email' => 'email']);
    }

    /** @test */
    public function a_user_who_successfully_set_mail_configuration()
    {
        Livewire::test('mail-setting')
            ->set('driver', 'test-driver')
            ->set('host', 'testuser@mail.com')
            ->set('port', '2525')
            ->set('from_address', 'test-address')
            ->set('from_name', 'test-name')
            ->set('encryption', 'tls')
            ->set('username', 'root')
            ->set('password', 'secret')
            ->call('save')
            ->assertNotSet('mailConfigured', true);
    }

    /** @test */
    public function a_user_who_enters_a_valid_email_address_will_get_sent_an_email()
    {
        $user = User::factory()->create();
        $mail = Mail::factory()->create();

        Livewire::test('auth.passwords.email')
            ->set('email', $user->email)
            ->call('sendResetPasswordLink')
            ->assertNotSet('emailSentMessage', true);

        $this->assertDatabaseHas('password_resets', [
            'email' => $user->email,
        ]);
    }
}
