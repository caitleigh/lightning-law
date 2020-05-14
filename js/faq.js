var acc = document.getElementsByClassName('accordion');
var close = document.getElementsByClassName('close-panel');
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener('click', function () {
    /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
    this.classList.toggle('active');

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === 'block') {
      panel.style.display = 'none';
    } else {
      panel.style.display = 'block';
    }
  });
}

for (i = 0; i < close.length; i++) {
  close[i].addEventListener('click', function () {
    /* Toggle between hiding and showing the active panel */
    var panel = this.parentElement;
    if (panel.style.display === 'block') {
      panel.style.display = 'none';
    } else {
      panel.style.display = 'block';
    }
  });
}