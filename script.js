//ambil elemen yang dibutuhkan
var keyword = document.getElementById('keyword');
var tombolSearch = document.getElementById('tombol-search');
var container = document.getElementById('container');

// tombolSearch.addEventListener('click', function(){
//     alert('berhasil');
// });

//tambahkan event ketika keywordditulis
keyword.addEventListener('keyup', function() {
    // console.log(keyword.value);

    //buat objek ajax
    var xhr = new XMLHttpRequest();

    //mengecek kesiapan ajax
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status==200){
            // console.log(xhr.responseText);
            container.innerHTML = xhr.responseText;
        }
    }

    //eksekusi ajax
    xhr.open('GET', 'ajax/obatlagi.php?keyword=' +keyword.value, true);
    xhr.send();


})