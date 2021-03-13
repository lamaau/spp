<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function registration_page_contains_livewire_component()
    {
        $this->get(route('register'))
            ->assertSuccessful()
            ->assertSeeLivewire('auth.register');
    }

    /** @test */
    public function is_redirected_if_already_logged_in()
    {
        $user = User::factory()->create();

        $this->be($user);

        $this->get(route('register'))
            ->assertRedirect(route('home'));
    }

    // /** @test */
    // function a_user_can_register()
    // {
    //     Event::fake();

    //     Livewire::test('auth.register')
    //         ->set('name', 'Test user')
    //         ->set('email', 'testuser@mail.com')
    //         ->set('password', 'secret')
    //         ->set('passwordConfirmation', 'password')
    //         ->call('register')
    //         ->assertRedirect(route('install'));

    //     $this->assertTrue(User::whereEmail('testuser@mail.com')->exists());
    //     $this->assertEquals('testuser@mail.com', Auth::user()->email);

    //     Event::assertDispatched(Registered::class);
    // }

    /** @test */
    function name_is_required()
    {
        Livewire::test('auth.register')
            ->set('name', '')
            ->call('register')
            ->assertHasErrors(['name' => 'required']);
    }

    /** @test */
    function email_is_required()
    {
        Livewire::test('auth.register')
            ->set('email', '')
            ->call('register')
            ->assertHasErrors(['email' => 'required']);
    }

    /** @test */
    function email_is_valid_email()
    {
        Livewire::test('auth.register')
            ->set('email', 'usertest')
            ->call('register')
            ->assertHasErrors(['email' => 'email']);
    }

    /** @test */
    function email_hasnt_been_taken_already()
    {
        User::factory()->create(['email' => 'usertest@mail.com']);

        Livewire::test('auth.register')
            ->set('email', 'usertest@mail.com')
            ->call('register')
            ->assertHasErrors(['email' => 'unique']);
    }

    /** @test */
    function see_email_hasnt_already_been_taken_validation_message_as_user_types()
    {
        User::factory()->create(['email' => 'usertest@mail.com']);

        Livewire::test('auth.register')
            ->set('email', 'smallstack@gmail.com')
            ->assertHasNoErrors()
            ->set('email', 'usertest@mail.com')
            ->call('register')
            ->assertHasErrors(['email' => 'unique']);
    }

    /** @test */
    function password_is_required()
    {
        Livewire::test('auth.register')
            ->set('password', '')
            ->set('passwordConfirmation', 'password')
            ->call('register')
            ->assertHasErrors(['password' => 'required']);
    }

    /** @test */
    function password_matches_password_confirmation()
    {
        Livewire::test('auth.register')
            ->set('email', 'usertest@mail.com')
            ->set('password', 'password')
            ->set('passwordConfirmation', 'not-password')
            ->call('register')
            ->assertHasErrors(['password' => 'same']);
    }
}
