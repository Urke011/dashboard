<template>
    <div>
        <label class="text-white mb-2 fw-semibold" for="category">
            {{ isSubCategoryView ? 'Where did you shop?' : 'Choose the category of the bill for payment' }}
        </label>

        <div class="row g-3">
            <div
                v-for="item in currentCategoriesSorted"
                :key="item.id"
                class="col-6 col-md-4 col-lg-4"
            >
                <div
                    class="card h-100 cursor-pointer"
                    :class="{
            'border-primary': selectedCategoryId === item.id,
            'border-2': selectedCategoryId === item.id
          }"
                    @click="handleClick(item)"
                >
                    <div class="image-wrapper">
                        <img
                            :src="item.img"
                            :alt="item.label"
                            class="category-img"
                            :class="{ selected: selectedCategoryId === item.id }"
                        />
                    </div>
                    <div
                        class="text-white fw-semibold text-center p-2"
                        style="background-color: #0a001f;"
                    >
                        {{ item.label }}
                    </div>
                </div>
            </div>
        </div>

        <button v-if="isSubCategoryView" class="btn btn-light mt-4" @click="goBack">
            ← Go back
        </button>

        <!-- Hidden input sends ID -->
        <input
            type="hidden"
            name="receipt_category_id"
            :value="selectedCategoryId"
            required
        />
        <input
            type="hidden"
            name="receipt_category_label"
            :value="selectedCategoryLabel"
        />
    </div>
</template>

<script>
export default {
    data() {
        return {
            selectedCategoryId: null,
            isSubCategoryView: false,
            selectedCategoryLabel: '',

            mainCategories: [
                { id: 1, label: 'Education', img: '/images/receipt-logos/education.png' },
                { id: 2, label: 'Gifts', img: '/images/receipt-logos/gifts.jpg' },
                { id: 3, label: 'Nightlife', img: '/images/receipt-logos/nightLife.png' },
                { id: 4, label: 'Opel', img: '/images/receipt-logos/opel.png' },
                { id: 5, label: 'Cost of living', img: '/images/receipt-logos/racuni.png' },
                { id: 6, label: 'Renovation', img: '/images/receipt-logos/renoviranje.jpg' },
                { id: 7, label: 'Travel', img: '/images/receipt-logos/travel.jpg' },
                { id: 8, label: 'Other costes', img: '/images/receipt-logos/other.jpg' },
                { id: 9, label: 'Food', img: '/images/receipt-logos/food.jpg' }
            ],

            foodSubcategories: [
                { id: 10, label: 'Aldi', img: '/images/receipt-logos/food/aldi.jpg' },
                { id: 11, label: 'Aroma', img: '/images/receipt-logos/food/aroma.png' },
                { id: 12, label: 'Butcher', img: '/images/receipt-logos/food/butcher.png' },
                { id: 13, label: 'Fruits', img: '/images/receipt-logos/food/fruit.png' },
                { id: 14, label: 'Lidl', img: '/images/receipt-logos/food/Lidl-Logo.svg.png' },
                { id: 15, label: 'Maxi', img: '/images/receipt-logos/food/maxi.jpg' },
                { id: 16, label: 'McDonalds', img: '/images/receipt-logos/food/McDonalds.svg.png' },
                { id: 17, label: 'Rewe', img: '/images/receipt-logos/food/rewe.png' }
            ]
        }
    },
    computed: {
        currentCategories() {
            return this.isSubCategoryView ? this.foodSubcategories : this.mainCategories;
        },
        currentCategoriesSorted() {
            return this.currentCategories.slice().sort((a, b) => a.label.localeCompare(b.label));
        }
    },
    methods: {
        handleClick(category) {
            if (!this.isSubCategoryView && category.label.toLowerCase() === 'food') {
                this.isSubCategoryView = true;
                this.selectedCategoryId = null;
                this.selectedCategoryLabel = '';
            } else {
                this.selectedCategoryId = category.id;
                this.selectedCategoryLabel = category.label;
            }
        },
        goBack() {
            this.isSubCategoryView = false;
            this.selectedCategoryId = null;
            this.selectedCategoryLabel = '';
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
