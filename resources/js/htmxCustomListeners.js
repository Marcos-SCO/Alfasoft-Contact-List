function requestListeners() {
  // Add class when a request starts
  document.addEventListener('htmx:beforeRequest', function (event) {
      document.querySelector('body')?.classList.add('loading');
  });

  // Remove class after the HTMX swap completes
  document.addEventListener('htmx:afterSwap', function (event) {
      document.querySelector('body')?.classList.remove('loading');
  });

  // Remove class when navigating back from history
  document.addEventListener('htmx:historyRestore', function (event) {
      document.querySelector('body')?.classList.remove('loading');
  });
}

// Initialize request listeners
requestListeners();