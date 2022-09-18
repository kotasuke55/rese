//ハンバーガーメニューとドロワーメニュー
const target = document.getElementById("menu");
target.addEventListener('click', () => {
  target.classList.toggle('open');
  const guestNav = document.getElementById('guest_nav');
  guestNav.classList.toggle('in');
});

target.addEventListener('click', () => {
  target.classList.toggle('authOpen');
  const authNav = document.getElementById('auth_nav');
  authNav.classList.toggle('in');
});

//予約時の日付の初期値を当日にする記述
//var date = new Date();
//var yyyy = date.getFullYear();
//var mm = ("0" + (date.getMonth() + 1)).slice(-2);
//var dd = ("0" + (date.getDate() + 1)).slice(-2);
//document.getElementById("date").value = yyyy + '-' + mm + '-' + dd;

//予約の日付を当日からにする記述
//document.getElementById("date").min = yyyy + '-' + mm + '-' + dd;

//予約時の入力をリアルタイムで反映させる記述
window.addEventListener('DOMContentLoaded',function () {
  const date = document.getElementById('date');
  const time = document.getElementById('time');
  const number = document.getElementById('number');

  outputDate.textContent = date.value;
  outputTime.textContent = time.value;
  outputNumber.textContent = number.value+'人';

  date.addEventListener('input', function () {
    let outputDate = document.getElementById('outputDate');
    outputDate.textContent = date.value;
  });

  time.addEventListener('input', function () {
    let outputTime = document.getElementById('outputTime');
    outputTime.textContent = time.value;
  });

  number.addEventListener('input', function () {
    let outputNumber = document.getElementById('outputNumber');
    outputNumber.textContent = number.value+'人';
  });
});


