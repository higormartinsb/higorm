self.addEventListener("install", (event) => {
  event.waitUntil(
    caches.open("app-cache").then((cache) => {
      return cache.addAll([
        "/higorm/",
        "/higorm/index.html",
        "/higorm/pedidos.html",
        "/higorm/manifest.json",
        "/higorm/css/styles.css",
        "/higorm/js/scripts.js",
        "/higorm/img/icons/image512x512.png",
        "/higorm/img/icons/image192x192.png"
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
