var tipoEstadoCivil = document.getElementById('estadocivil');


tipoEstadoCivil.onchange = function() { 

    var estadocivil = tipoEstadoCivil.value;

    if(estadocivil == 'Solteiro') {
        document.getElementById('nomeconjugue').required = false;
        document.getElementById('cpfconjugue').required = false;
        document.getElementById('datanascconjugue').required = false;
        document.getElementById('sexoconjugue').required = false;
        document.getElementById('telefoneconjugue').required = false;
        document.getElementById('racacorconjugue').required = false;
        document.getElementById('etniaconjugue').required = false;
        document.getElementById('naturalconjugue').required = false;
        document.getElementById('nacionalconjugue').required = false;
        document.getElementById('escolaridadeconjugue').required = false;
        document.getElementById('ensinoconjugue').required = false;
        document.getElementById('paiconjugue').required = false;
        document.getElementById('maeconjugue').required = false;

    } else if ( estadocivil == 'Viuvo') {
        document.getElementById('nomeconjugue').required = false;
        document.getElementById('cpfconjugue').required = false;
        document.getElementById('datanascconjugue').required = false;
        document.getElementById('sexoconjugue').required = false;
        document.getElementById('telefoneconjugue').required = false;
        document.getElementById('racacorconjugue').required = false;
        document.getElementById('etniaconjugue').required = false;
        document.getElementById('naturalconjugue').required = false;
        document.getElementById('nacionalconjugue').required = false;
        document.getElementById('escolaridadeconjugue').required = false;
        document.getElementById('ensinoconjugue').required = false;
        document.getElementById('paiconjugue').required = false;
        document.getElementById('maeconjugue').required = false;
    }
    else if ( estadocivil == 'Separado') {
        document.getElementById('nomeconjugue').required = false;
        document.getElementById('cpfconjugue').required = false;
        document.getElementById('datanascconjugue').required = false;
        document.getElementById('sexoconjugue').required = false;
        document.getElementById('telefoneconjugue').required = false;
        document.getElementById('racacorconjugue').required = false;
        document.getElementById('etniaconjugue').required = false;
        document.getElementById('naturalconjugue').required = false;
        document.getElementById('nacionalconjugue').required = false;
        document.getElementById('escolaridadeconjugue').required = false;
        document.getElementById('ensinoconjugue').required = false;
        document.getElementById('paiconjugue').required = false;
        document.getElementById('maeconjugue').required = false;
    }
    else if ( estadocivil == 'Divorciado') {
        document.getElementById('nomeconjugue').required = false;
        document.getElementById('cpfconjugue').required = false;
        document.getElementById('datanascconjugue').required = false;
        document.getElementById('sexoconjugue').required = false;
        document.getElementById('telefoneconjugue').required = false;
        document.getElementById('racacorconjugue').required = false;
        document.getElementById('etniaconjugue').required = false;
        document.getElementById('naturalconjugue').required = false;
        document.getElementById('nacionalconjugue').required = false;
        document.getElementById('escolaridadeconjugue').required = false;
        document.getElementById('ensinoconjugue').required = false;
        document.getElementById('paiconjugue').required = false;
        document.getElementById('maeconjugue').required = false;
    }
    else if ( estadocivil == 'Casado') {
        document.getElementById('nomeconjugue').required = true;
        document.getElementById('cpfconjugue').required = true;
        document.getElementById('datanascconjugue').required = true;
        document.getElementById('sexoconjugue').required = true;
        document.getElementById('telefoneconjugue').required = true;
        document.getElementById('racacorconjugue').required = true;
        document.getElementById('etniaconjugue').required = true;
        document.getElementById('naturalconjugue').required = true;
        document.getElementById('nacionalconjugue').required = true;
        document.getElementById('escolaridadeconjugue').required = true;
        document.getElementById('ensinoconjugue').required = true;
        document.getElementById('paiconjugue').required = true;
        document.getElementById('maeconjugue').required = true;
    }
    else if ( estadocivil == 'UniaoEst') {
        document.getElementById('nomeconjugue').required = true;
        document.getElementById('cpfconjugue').required = true;
        document.getElementById('datanascconjugue').required = true;
        document.getElementById('sexoconjugue').required = true;
        document.getElementById('telefoneconjugue').required = true;
        document.getElementById('racacorconjugue').required = true;
        document.getElementById('etniaconjugue').required = true;
        document.getElementById('naturalconjugue').required = true;
        document.getElementById('nacionalconjugue').required = true;
        document.getElementById('escolaridadeconjugue').required = true;
        document.getElementById('ensinoconjugue').required = true;
        document.getElementById('paiconjugue').required = true;
        document.getElementById('maeconjugue').required = true;
    }
}