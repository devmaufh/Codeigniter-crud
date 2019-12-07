let table = document.getElementById("tablas");
for (let i = 0; i <=10; i++) {
    let row = table.insertRow(i);
    for (let j =0; j <10; j++) {
        let cell = row.insertCell(j);
        if(i==0)cell.innerHTML = "Tabla del "+(j+1);
        else cell.innerHTML = (j+1) +" x "+ i + " = " + (j+1)*i;      
    }
}
var insert = (row, cell) => {return }