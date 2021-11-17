require('./bootstrap');

window.addEventListener('load',()=>{

    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/sw.js')
          .then(() => {
            console.log('Service worker registered.');
          })
          .catch((error) => {
            console.warn('ServiceWorker error', error)
          });
        }
})
