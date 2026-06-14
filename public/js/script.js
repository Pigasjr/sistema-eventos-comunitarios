document.addEventListener('DOMContentLoaded', function() {
    const descricao = document.getElementById('descricao');
    const contador = document.getElementById('contadorDescricao');

    if(descricao && contador) {
        descricao.addEventListener('input', function() {
            contador.textContent = descricao.value.length;
        });
    }
    const uf = document.getElementById('uf');
    const cidade = document.getElementById('cidade');

    if(uf && cidade) {
        carregarEstados();

        uf.addEventListener('change', function() {
            const ufSelecionada = uf.value;

            if(ufSelecionada == '') {
                cidade.innerHTML = '<option value="">Selecione um estado Primeiramente</option>';
                cidade.disabled = true;
                return;
            }
            carregarCidades(ufSelecionada);
        });
    }
     async function carregarEstados() {
        try {
            const resposta = await fetch('https://brasilapi.com.br/api/ibge/uf/v1');
            const estados = await resposta.json();

            estados.sort((a, b) => a.nome.localeCompare(b.nome));

            uf.innerHTML = '<option value="">...estados...</option>';
            estados.forEach(function (estado){
                const option = document.createElement('option');
                option.value = estado.sigla;
                option.textContent = `${estado.nome} (${estado.sigla})`;
                uf.appendChild(option);
            });
        } catch (error) {
            console.error('Erro ao carregar estados:', error);
            uf.innerHTML = '<option value="">Erro ao carregar estados</option>';
        }
    }
    async function carregarCidades(ufSelecionada) {
        try {
            cidade.innerHTML = '<option value="">Carregando cidades...</option>';
            cidade.disabled = true;

            const resposta = await fetch(`https://brasilapi.com.br/api/ibge/municipios/v1/${ufSelecionada}`);
            const cidades = await resposta.json();

            cidades.sort((a, b) => a.nome.localeCompare(b.nome));

            cidade.innerHTML = '<option value="">Selecione a cidade</option>';

            cidades.forEach(function (municipio) {
                const option = document.createElement('option');
                option.value = municipio.nome;
                option.textContent = municipio.nome;
                cidade.appendChild(option);
            });

            cidade.disabled = false;
        } catch (erro) {
            cidade.innerHTML = '<option value="">Erro ao carregar cidades</option>';
            cidade.disabled = true;
            console.error('Erro ao buscar cidades:', erro);
        }
    }

    const formEvento = document.getElementById('formEvento');

    if (formEvento) {
        formEvento.addEventListener('submit', function (event) {
            const titulo = document.getElementById('titulo').value.trim();
            const cidadeSelecionada = document.getElementById('cidade').value;

            if (titulo.length < 3) {
                alert('O título do evento deve ter pelo menos 3 caracteres.');
                event.preventDefault();
                return;
            }

            if (cidadeSelecionada === '') {
                alert('Selecione a cidade do evento.');
                event.preventDefault();
                return;
            }
        });
    }

const botoesExcluir = document.querySelectorAll('.btn-excluir');
botoesExcluir.forEach(function(botao) {
    botao.addEventListener('click', function(event) {
        const confirmar = confirm('Tem certeza que deseja excluir este evento?');
        if (!confirmar) {
            event.preventDefault();
        }
    });
});
});
