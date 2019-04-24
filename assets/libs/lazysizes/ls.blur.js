var lowBg = document.querySelectorAll('.lazyload[data-blur]');
[].slice.call(lowBg).forEach(function(elem,index){
    elem.classList.add('lazy-blur');
    if(elem.nodeName == 'IMG') {
        elem.setAttribute('src', elem.getAttribute('data-blur'));
    } else {
        elem.style.backgroundImage = 'url(' + elem.getAttribute('data-blur') + ')';
    }
});