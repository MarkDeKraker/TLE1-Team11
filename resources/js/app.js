
document.getElementById('openModalButton').addEventListener('click', function() {
    document.getElementById('userModal').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
});

document.getElementById('closeModal').addEventListener('click', function() {
    document.getElementById('userModal').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
});

// Close modal if clicked outside the content
window.addEventListener('click', function(event) {
    if (event.target == document.getElementById('userModal')) {
        document.getElementById('userModal').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }
});

document.getElementById('id-side-nav-open').addEventListener('click', function(){
    document.getElementById('id-side-nav').style.display = 'block';
})

document.getElementById('id-side-nav-close').addEventListener('click', function(){
    document.getElementById('id-side-nav').style.display = 'none';
})