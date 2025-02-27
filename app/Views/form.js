document.getElementById('moreRising').addEventListener('click', () => {
    const id = 'blockRising'
    const block = 'rising'

    cloneElement(id, block)
})

document.getElementById('moreTransport').addEventListener('click', () => {
    const id = 'blockTransport'
    const block = 'transport'

    cloneElement(id, block)
})

document.getElementById('moreRepast').addEventListener('click', () => {
    const id = 'blockRepast'
    const block = 'repast'

    cloneElement(id, block)
})

document.getElementById('morePayment').addEventListener('click', () => {
    const id = 'blockPayment'
    const block = 'payment'

    cloneElement(id, block)
})

document.getElementById('moreSales').addEventListener('click', () => {
    const id = 'blockSales'
    const block = 'sales'

    cloneElement(id, block)
})
document.getElementById('moreOther').addEventListener('click', () => {
    const id = 'blockOther'
    const block = 'other'

    cloneElement(id, block)
})

function cloneElement(id, block) {
    const Div = document.getElementById(id)
    const newDiv = Div.cloneNode(true)
    const global = document.getElementById(block)
    const nbrInput = global.querySelectorAll('input').length
    const newIndex = Math.floor(nbrInput/2) + 1

    newDiv.querySelectorAll('input').forEach(input => {
        const currentName = input.getAttribute('name')
        input.setAttribute('name', currentName.replace(/\d+$/, newIndex))
        input.setAttribute('id', currentName.replace(/\d+$/, newIndex))
        console.log(newIndex)
        console.log(`Nouveau champ cloné: ${input.getAttribute('name')}`);
    })

    Div.parentNode.appendChild(newDiv)
}