/*
=========================================
|                                       |
|       Multi-Check checkbox            |
|                                       |
=========================================
*/

function checkall(clickchk, relChkbox) {

    var checker = $('#' + clickchk);
    var multichk = $('.' + relChkbox);


    checker.click(function () {
        multichk.prop('checked', $(this).prop('checked'));
    });
}


/*
=========================================
|                                       |
|           MultiCheck                  |
|                                       |
=========================================
*/

/*
    This MultiCheck Function is recommanded for datatable
*/

function multiCheck(tb_var) {
    tb_var.on("change", ".chk-parent", function() {
        var e=$(this).closest("table").find("td:first-child .child-chk"), a=$(this).is(":checked");
        $(e).each(function() {
            a?($(this).prop("checked", !0), $(this).closest("tr").addClass("active")): ($(this).prop("checked", !1), $(this).closest("tr").removeClass("active"))
        })
    }),
    tb_var.on("change", "tbody tr .new-control", function() {
        $(this).parents("tr").toggleClass("active")
    })
}

/*
=========================================
FUNÇÃO DE PESQUISA NA BARRA DO NAVBAR

=========================================
*/

// Função para buscar itens do menu do sidebar, ignorando <a> de dropdowns,
// mas mostrando o <a> do dropdown correspondente ao lado do resultado
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('sidebar-search');
    const resultsList = document.getElementById('sidebar-search-results');

    // Colete os itens do sidebar (apenas <a> que NÃO são dropdown-toggle)
    // e encontre o <a> dropdown-toggle pai, se existir
    function getSidebarMenuItems() {
        return Array.from(document.querySelectorAll('.sidebar-wrapper .menu a'))
            .filter(link => !link.classList.contains('dropdown-toggle'))
            .map(link => {
                // Procura o dropdown-toggle mais próximo acima na hierarquia
                let parentDropdown = link.closest('li');
                let dropdownLink = null;
                while (parentDropdown) {
                    const dropdownToggle = parentDropdown.querySelector('a.dropdown-toggle');
                    if (dropdownToggle) {
                        dropdownLink = dropdownToggle;
                        break;
                    }
                    parentDropdown = parentDropdown.parentElement.closest('li');
                }
                return {
                    text: link.textContent.trim(),
                    href: link.getAttribute('href'),
                    dropdown: dropdownLink
                        ? {
                            text: dropdownLink.textContent.trim(),
                            href: dropdownLink.getAttribute('href')
                        }
                        : null
                };
            });
    }

    function filterMenuItems(query) {
        if (!query) return [];
        const items = getSidebarMenuItems();
        return items.filter(item => item.text.toLowerCase().includes(query.toLowerCase()));
    }

    searchInput.addEventListener('input', function () {
        const query = this.value;
        const results = filterMenuItems(query);

        resultsList.innerHTML = '';
        if (results.length > 0 && query) {
            results.forEach(item => {
                const li = document.createElement('li');
                li.className = 'list-group-item';
                li.style.cursor = 'pointer';

                // Cria o link do resultado
                const mainLink = document.createElement('a');
                mainLink.textContent = item.text ;
                mainLink.href = item.href;
                mainLink.style.marginRight = '10px';

                // Cria o link do dropdown correspondente, se existir
                li.appendChild(mainLink);
                if (item.dropdown) {
                    const dropdownLink = document.createElement('a');
                    dropdownLink.textContent = `(${item.dropdown.text})`;
                    dropdownLink.href = item.dropdown.href || 'javascript:void(0);';
                    dropdownLink.style.fontSize = '90%';
                    dropdownLink.style.marginLeft = '5px';
                    dropdownLink.style.color = '#888';
                    li.appendChild(dropdownLink);
                }

                li.addEventListener('click', function(e) {
                    // Só navega se clicar no mainLink
                    if (e.target === mainLink) {
                        window.location.href = item.href;
                    }
                    // Se clicar no dropdownLink, navega para o dropdown
                    if (item.dropdown && e.target === li.querySelector('a:nth-child(2)')) {
                        window.location.href = item.dropdown.href;
                    }
                });

                resultsList.appendChild(li);
            });
            resultsList.style.display = 'block';
        } else {
            resultsList.style.display = 'none';
        }
    });

    // Esconde a lista ao clicar fora
    document.addEventListener('click', function (e) {
        if (!resultsList.contains(e.target) && e.target !== searchInput) {
            resultsList.style.display = 'none';
        }
    });
});

function clearSidebarSearch() {
    const searchInput = document.getElementById('sidebar-search');
    const resultsList = document.getElementById('sidebar-search-results');
    searchInput.value = '';
    resultsList.innerHTML = '';
    resultsList.style.display = 'none';
}
