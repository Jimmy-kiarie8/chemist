<template>
<div class="card-row">
    <div v-for="(card, index) in cards" :key="index" @mouseover="hoverCard(index)" @mouseout="hoverCard(-1)" class="card">

        <img class="card-image"
        :class="{'selected': isSelected(index)}"
        :src="card.image">

        <div class="card-footer">
            <p class="card-text">RECIPE</p>
            <h3 class="card-title">{{card.title}}</h3>
            <p class="card-text">by
                <span
        class="card-author"
        :class="{'selected': isSelected(index)}">
            {{card.author}}
    </span>
            </p>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            // cards: cards,
            selectedCard: -1,
            cards: [{
                    title: 'Gooey PBJ Brownies',
                    author: 'John Walibur',
                    image: 'storage/products/product1.jpg'
                },
                {
                    title: 'Crisp Spanish Tortilla Matzo Brei',
                    author: 'Colman Andrews',
                    image: 'storage/products/product2.jpg'
                },
                {
                    title: 'Grilled Shrimp with Lemon and Garlic',
                    author: 'Celeste Mills',
                    image: 'storage/products/product4.jpg'
                }
            ]
        }
    },
    methods: {
        hoverCard(selectedIndex) {
            this.selectedCard = selectedIndex
            // this.animateCards()
        },
        // animateCards() {
        //     this.cards.forEach((card, index) => {
        //         const direction = this.calculateCardDirection(index, this.selectedCard)
        //         TweenMax.to(
        //             this.$refs `[card_${index}]`, 0.3, {
        //                 x: direction * 50
        //             })
        //     })
        // },
        calculateCardDirection(cardIndex, selectedIndex) {
            if (selectedIndex === -1) {
                return 0
            }
            const diff = cardIndex - selectedIndex
            return diff === 0 ? 0 : diff / Math.abs(diff)
        },
        isSelected(cardIndex) {
            return this.selectedCard === cardIndex
        }
    },
    // hoverCard(selectedIndex) {
    //     this.selectedCard = selectedIndex
    // },
}
</script>

<style scoped>
.card-row {
    display: flex;
    justify-content: center;
    align-items: center;
    min-width: 780px;
    width: 100%;
    height: 500px;
}

.card {
    position: relative;
    background-color: #FFFFFF;
    height: 370px;
    width: 240px;
    margin: 10px;
    overflow: hidden;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.5);
}

.card-image {
    /* center horizontally overflown image */
    position: absolute;
    left: -9999px;
    right: -9999px;
    margin: auto;

    height: 220px;
    min-width: 100%;
}

.card-footer {
    position: absolute;
    bottom: 0;
    height: 130px;
    padding: 10px 15px;
    font-family: Helvetica;
}

.card-text {
    font-size: 14px;
    color: rgba(0, 0, 0, 0.7);
}

.card-title {
    font-family: Serif;
}

.card-author {
    font-size: 14px;
    color: #BAB096;
}

.card {
    /* the other rules */
    transition: height 0.3s, box-shadow 0.3s;
}

.card:hover {
    height: 410px;
    box-shadow: 20px 20px 40px 0px rgba(0, 0, 0, 0.5);
}

.card-image {
    /* the other rules */
    transition: height 0.3s, opacity 0.3s;
}

.card-image.selected {
    height: 410px;
    opacity: 0.3;
}

.card-author {
    /* the other rules */
    transition: color 0.3s;
}

.card-author.selected {
    color: #6a6456;
}
</style>
