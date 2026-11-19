import './bootstrap';

// if ('serviceWorker' in navigator && 'PushManager' in window) {
//     window.addEventListener('load', async () => {
//         try {
//             console.log('Mendaftarkan Service Worker...');
//             const registration = await navigator.serviceWorker.register('/sw.js');
//             console.log('Service Worker berhasil:', registration);

//             // Minta izin notifikasi
//             const permission = await Notification.requestPermission();
//             console.log('Status izin notifikasi:', permission);

//             if (permission === 'granted') {
//                 // 1. Ambil VAPID Public Key dari tag <meta> HTML
//                 const vapidMeta = document.querySelector('meta[name="vapid-pub-key"]');
//                 const vapidPublicKey = vapidMeta ? vapidMeta.getAttribute('content') : '';

//                 if (!vapidPublicKey) {
//                     console.error('VAPID Public Key kosong! Pastikan tag meta sudah ditambahkan di Blade.');
//                     return;
//                 }

//                 // Subscribe push manager
//                 const subscription = await registration.pushManager.subscribe({
//                     userVisibleOnly: true,
//                     applicationServerKey: urlB64ToUint8Array(vapidPublicKey)
//                 });
//                 console.log('Push Subscription objek berhasil dibuat:', subscription);

//                 // 2. Ambil CSRF Token dari tag <meta> HTML
//                 const csrfMeta = document.querySelector('meta[name="csrf-token"]');
//                 if (!csrfMeta) {
//                     console.error('CSRF Token tidak ditemukan! Pastikan tag meta csrf-token ada di Blade.');
//                     return;
//                 }

//                 // Kirim ke backend Laravel
//                 const response = await fetch('/push-subscribe', {
//                     method: 'POST',
//                     headers: {
//                         'Content-Type': 'application/json',
//                         'X-CSRF-TOKEN': csrfMeta.getAttribute('content')
//                     },
//                     body: JSON.stringify(subscription)
//                 });

//                 const result = await response.json();
//                 console.log('Respon dari server Laravel:', result);
//             }
//         } catch (err) {
//             console.error('Terjadi error pada proses push notification:', err);
//         }
//     });
// }

// function urlB64ToUint8Array(base64String) {
//     const padding = '='.repeat((4 - (base64String.length % 4)) % 4);
//     const base64 = (base64String + padding)
//         .replace(/\-/g, '+')
//         .replace(/_/g, '/');

//     const rawData = window.atob(base64);
//     const outputArray = new Uint8Array(rawData.length);

//     for (let i = 0; i < rawData.length; ++i) {
//         outputArray[i] = rawData.charCodeAt(i);
//     }
//     return outputArray;
// }