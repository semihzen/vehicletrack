

const nam=document.querySelector("#name");
const surname=document.querySelector("#surname");
const mail=document.querySelector("#mail");
const ekle=document.querySelector("#ekle");
const table=document.querySelector("#tablo");

ekle.onclick=function ekle(){
  let tname=document.createElement("td");
  let tsurname=document.createElement("td");
  let tmail=document.createElement("td");

  tname.textContent=nam.value;
  tsurname.textContent=surname.value;
  tmail.textContent=mail.value;

  let tr=document.createElement("tr");
  tr.appendChild(tname);
  tr.appendChild(tsurname);
  tr.appendChild(mail);
  tablo.appendChild(tr);
  


}

