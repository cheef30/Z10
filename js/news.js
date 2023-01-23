const velStranice = 12

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

function popuniDivove() {
    popuniMeceve()
    popuniVesti(1, velStranice)
}

function popuniMeceve() {
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

    let istiTim = el.mec.timoviRezultati[0].tim.id == el.mec.timoviRezultati[1].tim.id

    if (istiTim)
        rezDeo = '<span id="v">TBD</span>'
    
    if (el.mec.timoviRezultati[0].rezultat != null && el.mec.timoviRezultati[1].rezultat != null)
    {
        if (istiTim) {
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

function popuniVesti(stranica, velicinaStranice, postaviNajnoviji = true) {
    let brStrEl = document.getElementById('brStr')

    let parametri = {
        objekat: 'vesti',
        str: stranica,
        velStr: velicinaStranice
    }
    get(parametri).then((data) => {
        if (data.res.length == 0)
            return
        
        let wrapper = document.getElementsByClassName('wrapper')[0]
        wrapper.innerHTML = ''
        
        if (postaviNajnoviji)
        {
            let newest = document.getElementsByClassName('lastNew')[0]
            newest.innerHTML = `
            <div class="image">
                <img src="../images/vesti/${data.res[0].putanjaSlike}" alt="">
                <h1>${kraciNaslov(data.res[0].naslov, 66)}</h1>
            </div>
            `
        }

        data.res.forEach(el => {
            wrapper.innerHTML += `
            <div class="kartica">
                <div class="slika">
                    <a target="_blank" href="${el.link}"><img src="../images/vesti/${el.putanjaSlike}" alt=""></a>
                </div>
                <div class="naslov">
                <h4>${kraciNaslov(el.naslov, 56)}</h4>
                </div>
            </div>
            `
        });

        brStrEl.innerHTML = stranica
    })
}

function kraciNaslov(naslov, maksDuzina) {
    if (naslov.length > maksDuzina)
        return naslov.substring(0, maksDuzina) + '...'

    return naslov
}

function stranica(pomeraj) {
    let trenutnaStranica = parseInt(document.getElementById('brStr').innerHTML)
    let str = trenutnaStranica + pomeraj
    if (str < 1)
        return

    popuniVesti(str, velStranice, false)
}