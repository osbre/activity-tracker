import 'alpinejs'

window.app = () => ({
    activities: [],
    meta: {},
    async fetchData() {
        await fetch('/api/activities').then(r => r.json()).then(response => {
            this.activities = response.data;
            this.meta = response.meta;
        })
    },

    modalVisible: false,
    formData: {},
    async submitForm() {
        await fetch('/api/activities', {
            method: 'POST',
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(this.formData)
        }).then(() => {
            this.formData = {}
        }).then(() => {
            this.modalVisible = false
            this.fetchData()
        })
    },
});
