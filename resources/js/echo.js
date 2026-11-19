import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

// Nyalakan log agar kita bisa melihat status koneksi di Console F12
Pusher.logToConsole = true;
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'ap1',
    forceTLS: true
});