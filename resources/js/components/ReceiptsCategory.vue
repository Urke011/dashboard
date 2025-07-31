<template>
    <div>
        <label class="text-white mb-2 fw-semibold" for="category">
            {{ isSubCategoryView ? 'Where did you shop?' : 'Choose the category of the bill for payment' }}
        </label>

        <div class="row g-3">
            <div
                v-for="item in currentCategoriesSorted"
                :key="item.value"
                class="col-6 col-md-4 col-lg-4"
            >
                <div
                    class="card h-100 cursor-pointer"
                    :class="{
            'border-primary': selectedCategory === item.value,
            'border-2': selectedCategory === item.value
          }"
                    @click="handleClick(item)"
                >
                    <div class="image-wrapper">
                        <img
                            :src="item.img"
                            :alt="item.label"
                            class="category-img"
                            :class="{ selected: selectedCategory === item.value }"
                        />
                    </div>
                    <div class="text-white fw-semibold text-center p-2" style="background-color: #0a001f;">
                        {{ item.label }}
                    </div>
                </div>
            </div>
        </div>

        <button
            v-if="isSubCategoryView"
            class="btn btn-light mt-4"
            @click="goBack"
        >
            ← Go back
        </button>

        <input type="hidden" name="category" :value="selectedCategory" required />
    </div>
</template>

<script>
export default {
    data() {
        return {
            selectedCategory: null,
            isSubCategoryView: false,

            mainCategories: [
                { value: 'education', label: 'Education', img: '/images/receipt-logos/education.png' },
                { value: 'gifts', label: 'Gifts', img: '/images/receipt-logos/gifts.jpg' },
                { value: 'nightLife', label: 'Nightlife', img: '/images/receipt-logos/nightLife.png' },
                { value: 'opel', label: 'Opel', img: '/images/receipt-logos/opel.png' },
                { value: 'cost', label: 'Cost of living', img: '/images/receipt-logos/racuni.png' },
                { value: 'renovation', label: 'Renovation', img: '/images/receipt-logos/renoviranje.jpg' },
                { value: 'travel', label: 'Travel', img: '/images/receipt-logos/travel.jpg' },
                { value: 'other', label: 'Other costes', img: '/images/receipt-logos/other.jpg' },
                { value: 'food', label: 'Food', img: '/images/receipt-logos/food.jpg' }
            ],

            foodSubcategories: [
                { value: 'aldi', label: 'Aldi', img: '/images/receipt-logos/food/aldi.jpg' },
                { value: 'aroma', label: 'Aroma', img: '/images/receipt-logos/food/aroma.png' },
                { value: 'butcher', label: 'Butcher', img: '/images/receipt-logos/food/butcher.png' },
                { value: 'fruit', label: 'Fruits', img: '/images/receipt-logos/food/fruit.png' },
                { value: 'lidl', label: 'Lidl', img: '/images/receipt-logos/food/Lidl-Logo.svg.png' },
                { value: 'maxi', label: 'Maxi', img: '/images/receipt-logos/food/maxi.jpg' },
                { value: 'mcdonalds', label: 'McDonalds', img: '/images/receipt-logos/food/McDonalds.svg.png' },
                { value: 'rewe', label: 'Rewe', img: '/images/receipt-logos/food/rewe.png' }
            ]
        }
    },
    computed: {
        currentCategories() {
            return this.isSubCategoryView ? this.foodSubcategories : this.mainCategories;
        },
        currentCategoriesSorted() {
            // Sort by label alphabetically
            return this.currentCategories.slice().sort((a, b) => a.label.localeCompare(b.label));
        }
    },
    methods: {
        handleClick(category) {
            if (!this.isSubCategoryView && category.value === 'food') {
                this.isSubCategoryView = true;
                this.selectedCategory = null;
            } else {
                this.selectedCategory = category.value;
            }
        },
        goBack() {
            this.isSubCategoryView = false;
            this.selectedCategory = null;
        }
    }
}
</script>

<style scoped>
.cursor-pointer {
    cursor: pointer;
}

.border-primary {
    border-color: #e2b52d !important;
}

.category-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    border-top-left-radius: 0.375rem;
    border-top-right-radius: 0.375rem;
    transition: 0.3s ease-in-out;
}

.image-wrapper {
    position: relative;
    width: 100%;
    padding-top: 75%;
    overflow: hidden;
}

.image-wrapper img {
    position: absolute;
    top: 0;
    left: 0;
}

.card {
    background-color: transparent;
}

/* Animation and shadow on the selection */
.category-img.selected {
    filter: brightness(0.7);
    transform: scale(0.98);
    transition: all 0.3s;
}
</style>
