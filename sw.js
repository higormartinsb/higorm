// Simple service worker caching app shell for offline use
const CACHE = 'pan-complete-cache-v1';
const ASSETS = [
  './',
  './index.html',
  './app.js',
  './sw.js',
  './manifest.webmanifest',
  './icons/icon-192.png',
  './icons/icon-512.png'
];

self.addEventListener('install', (e) => {
  e.waitUntil(caches.open(CACHE).then(cache => cache.addAll(ASSETS)));
  self.skipWaiting();
});

self.addEventListener('activate', (e) => {
  e.waitUntil(
    caches.keys().then(keys => Promise.all(keys.map(k => (k !== CACHE ? caches.delete(k) : null))))
  );
  self.clients.claim();
});

self.addEventListener('fetch', (e) => {
  const url = new URL(e.request.url);
  e.respondWith(
    caches.match(e.request).then(res => res || fetch(e.request).then(resp => {
      if (e.request.method === 'GET' && url.origin === location.origin) {
        const copy = resp.clone();
        caches.open(CACHE).then(c => c.put(e.request, copy));
      }
      return resp;
    }).catch(() => caches.match('./index.html')))
  );
});
