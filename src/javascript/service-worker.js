//PWA
self.addEventListener("install", (event) => {
    event.waitUntil(
      caches.open("app-cache").then((cache) => {
        return cache.addAll([
          "/", 
          "/index.html", 
          "/manifest.json", 
          "/styles.css", 
          "/scripts.js", 
          "/icons/icon-192x192.png", 
          "/icons/icon-512x512.png"
        ]);
      })
    );
  });
  
  self.addEventListener("fetch", (event) => {
    event.respondWith(
      caches.match(event.request).then((cachedResponse) => {
        return cachedResponse || fetch(event.request);
      })
    );
  });
  