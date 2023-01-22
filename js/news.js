function upcoming(){
    var upcomingMatches = document.getElementById("upcoming")
    var pastResMatches = document.getElementById("pastRes")
    var upcomingBtn = document.getElementById("upcomingBtn")
    var pasResBtn = document.getElementById("pasResBtn")

    upcomingMatches.style.display = 'block';
    pastResMatches.style.display = 'none';
    upcomingBtn.style.borderBottom = '3px solid red'
    pasResBtn.style.borderBottom = '1px solid red'
}

function pastRes(){
    var upcomingMatches = document.getElementById("upcoming")
    var pastResMatches = document.getElementById("pastRes")
    var upcomingBtn = document.getElementById("upcomingBtn")
    var pasResBtn = document.getElementById("pasResBtn")

    upcomingMatches.style.display = 'none';
    pastResMatches.style.display = 'block';
    upcomingBtn.style.borderBottom = '1px solid red'
    pasResBtn.style.borderBottom = '3px solid red'
}

function popuniBuduceMeceve() {
    let parametri = {
        objekat: 'mecevi',
        str: 1,
        velStr: 2,
        sortPo: "datum, vreme",
        tipMeca: 1
    }
    get(parametri).then((data) => {
        let buduciMeceviDiv = document.getElementById('upcoming');

        buduciMeceviDiv.innerHTML = '';

        data.res.forEach(el => {
            console.log(el);

            buduciMeceviDiv.innerHTML += matchInfoHTML(el)
        });
    })

    parametri.sortPo = "datum desc, vreme desc"
    parametri.tipMeca = 2
    get(parametri).then((data) => {
        let prosliMeceviDiv = document.getElementById('pastRes')

        prosliMeceviDiv.innerHTML = ''

        data.res.forEach(el => {
            prosliMeceviDiv.innerHTML += matchInfoHTML(el)
        })
    })
}

function matchInfoHTML(el) {
    let datum = (new Date(Date.parse(el.mec.datum)).toLocaleDateString('default', {
        month: "short",
        day: "2-digit",
        year: "numeric"
    }));
    let vreme = el.mec.vreme

    let rezDeo = '<span id="v">V</span><span id="s">S</span>'
    if (el.mec.timoviRezultati.length == 1){
        el.mec.timoviRezultati.push(el.mec.timoviRezultati[0])
    }
    
    if (el.mec.timoviRezultati[0].rezultat != null && el.mec.timoviRezultati[1].rezultat != null)
    {
        if (el.mec.timoviRezultati[0].tim.id == el.mec.timoviRezultati[1].tim.id) {
            rezDeo = `<span id="v">${generisiRedniBroj(el.mec.timoviRezultati[0].rezultat)}</span>`
        }
        else
        {
            rezDeo = `<span id="v">${el.mec.timoviRezultati[0].rezultat}:${el.mec.timoviRezultati[1].rezultat}</span>`
        }
    }

    return `
    <div class="matchInfo">
        <div class="left">
            <p><span class="mini-title">${el.nazivIgre}</span><br><span class="not-bold">${el.nazivTakmicenja}</span></p>
        </div>
        <div class="right">
            <p>${vreme.substring(0, vreme.length - 3)}H<br><span class="not-bold">${datum}</span></p>
        </div>
    </div>
    <div class="slicice_dugme">
        <div class="slicice">
            <img class="up" src="../images/logos/${el.mec.timoviRezultati[0].tim.logo}" alt="">
            ${rezDeo}
            <img class="down" src="../images/logos/${el.mec.timoviRezultati[1].tim.logo}" alt="">
        </div>
        <div class="dugme">
            <div>
                <a href="#">
                    <p>
                        <span class="bg"></span>
                        <span class="base"></span>
                        <span class="text">Watch</span>
                    </p>
                </a>
            </div>
        </div>
    </div>
    <br>
`;
}

function generisiRedniBroj(br) {
    let vrednost = br.toString()

    if (br == 1)
        vrednost += 'st'
    else if (br == 2)
        vrednost += 'nd'
    else if (br == 3)
        vrednost += 'rd'
    else
        vrednost += 'th'

    return vrednost
}

function popuniVesti() {
    let parametri = {
        objekat: 'vesti',
        str: 1,
        velStr: 12
    }
    get(parametri).then((data) => {
        let wrapper = document.getElementsByClassName('wrapper')[0]
        console.log(data)
        wrapper.innerHTML = ''

        data.res.forEach(el => {
            wrapper.innerHTML += `
            <div class="kartica">
                <div class="slika">
                    <a target="_blank" href="${el.link}"><img src="../images/vesti/${el.slika}" alt=""></a>
                </div>
                <div class="naslov">
                <h4>${el.naslov}</h4>
                </div>
            </div>
            `
        });
    })
}