var fichier;

function glisser_fichier(e)
{
    e.preventDefault();
    document.getElementById('zone').style.background = "#CCC";
    for (i = 0; i < e.dataTransfer.files.length; i++)
    {
        fichier = e.dataTransfer.files[i];
        document.getElementById('nom_fichiers').innerHTML += "" + fichier.name + "<br>";
        envoi_fichier(fichier);
    }
}

function parcourir_fichier()
{
    document.getElementById('fichier').click();
    document.getElementById('fichier').onchange = function()
    {
        fichier = document.getElementById('fichier').files[0];
        document.getElementById('nom_fichiers').innerHTML += "" + fichier.name + "<br>";
        envoi_fichier(fichier);
    };
}

function envoi_fichier(fichier)
{
    if(fichier != undefined)
    {
        var form_data = new FormData();
        form_data.append('file', fichier);
        $.ajax({
            type: 'POST',
            url: 'envoi.php',
            contentType: false,
            processData: false,
            data: form_data,
            success:function(response) {
                alert(response);
                $('#fichier').val('');
            }
        });
    }
}