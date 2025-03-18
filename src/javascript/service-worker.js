//PWA
self.addEventListener("install", (event) => {
    event.waitUntil(
      caches.open("app-cache").then((cache) => {
        return cache.addAll([
          "/", 
          "/index.html", 
          "/manifest.json", 
          "/src/styles/styles.css", 
          "/src/javascript/scripts.js", 
          "/src/images/icons/image512x512.png", 
          "/src/images/icons/image192x192.png"
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

  