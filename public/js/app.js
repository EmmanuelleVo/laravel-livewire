// e.preventDefault
// Supprimer bouton du DOM
//

const app = {
    state() {
        let perPage = '10'
        let searchTerm = 'a'
        let sortField = 'name'
        let sortOrder = 'asc'
        let page = '1'
    },
    init() {
        const input = document.querySelector('#search-term')
        const forms = document.forms
        const buttons = document.querySelectorAll('button')
        const select = document.querySelector('select')
        let perPage = '10'
        let searchTerm = 'a'
        let sortField = 'name'
        let sortOrder = 'asc'
        let page = '1'

        Array.from(forms).forEach(form => { // possible with forOf
            form.addEventListener('submit', (e) => {
                e.preventDefault()
            })
        })

        Array.from(buttons).forEach(button => {
            button.remove()
        })

        sort()
        paginate()

        select.addEventListener('change', (e) => {
            perPage = e.currentTarget.value // e.target as HTMLSelect..
            makeRequest()

        })

        input.addEventListener('input', (e) => {
            searchTerm = e.currentTarget.value
            this.state.page = '1'
            makeRequest()
        })

        function sort() {
            const links = document.querySelectorAll('table a')
            links.forEach(link => {
                link.addEventListener('click', e => {
                    e.preventDefault()

                    if (sortOrder === 'asc') {
                        sortOrder = 'desc'
                    } else if (sortOrder === 'desc') {
                        sortOrder = 'asc'
                    }

                    if (e.currentTarget.textContent === 'Name') {
                        sortField = 'name'
                    } else if (e.currentTarget.textContent === 'Email') {
                        sortField = 'email'
                    } else if (e.currentTarget.textContent === 'Birthdate') {
                        sortField = 'birthdate'
                    }
                    makeRequest()
                })
            })
        }

        function paginate() {
            const paginationNav = document.querySelector('nav')
            const paginationLinks = document.querySelectorAll('a')
            paginationLinks.forEach(paginationLink => {
                paginationLink.addEventListener('click', e => {
                    e.preventDefault()
                    //state.page = e.currentTarget.dataset.pageNum // ajouter un data sur les a
                    page = Number(paginationLink.textContent.trim())
                    makeRequest()
                })
            })
        }

        function makeRequest() {
            let url = `http://livewire.test/ajax?perPage=${perPage}&searchTerm=${searchTerm}&sortField=${sortField}&sortOrder=${sortOrder}&page=${page}`
            history.pushState(state, '', url)
            fetch(url)
                .then((response) => response.text())
                .then((data) => updateDataTable(data))
        }

        function updateDataTable(data) {
            let table = document.querySelectorAll('table')
            // supprimer la pagination aussi
            table[0].remove()
            document.body.insertAdjacentHTML('beforeend', data)
            sort()
            paginate()
            // ou mutation observe

            /*const config = { attributes: true, childList: true, subtree: true };

            const callback = (mutationList, observer) => {
                for (const mutation of mutationList) {
                    if (mutation.type === 'childList') {
                        console.log('A child node has been added or removed.');
                    } else if (mutation.type === 'attributes') {
                        console.log(`The ${mutation.attributeName} attribute was modified.`);
                    }
                }
            };

            const observer = new MutationObserver(callback);
            observer.observe(newLinks, config);
            observer.disconnect();*/


        }

    },
}

window.addEventListener('load', () => {
    app.init()
})





