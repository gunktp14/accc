const btnToast = document.getElementById('liveToastBtn');

btnToast.addEventListener('click',function(){
    const liveToast = document.getElementById('liveToast');
    liveToast.classList.remove('hide');
});
