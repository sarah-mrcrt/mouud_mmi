<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoicePaid extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // return ['mail', 'database'];
        return ['database'];
    }

    // /**
    //  * Get the mail representation of the notification.
    //  *
    //  * @param  mixed  $notifiable
    //  * @return \Illuminate\Notifications\Messages\MailMessage
    //   */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('Mouud the sound of your life')
    //                 ->action('Mouud', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    //  public function toDatabase()
    // {
    //     return[
    //         'amout' => 1000,
    //         'invoice_action' => 'Play now',
    //         ];
    // }
    
    public function toDatabase($notifiable)
    {
        return[
            'user_name'=> $this->user->name,
            'user_id'=> $this->user->id,
            'user_avatar' => $this->user->avatar,
            'data' => 'This is my first notification',
        ];
    }


    // public function toBroadcast($notifiable)
    // {
    //     return new BroadcastMessage([
    //         'thread'=>$this->thread,
    //         'user'=>auth()->user()
    //     ]);
    // }
    
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
