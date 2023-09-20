import ResourceNavigationLink from './components/ResourceNavigationLink'
import ExternalLink from './components/resources/ExternalLink.vue'
import NovaResource from "./components/resources/NovaResource.vue";

Nova.booting((Vue, router, store) => {
    Vue.component('resource-navigation-link', ResourceNavigationLink)
    Vue.component('resource-navigation-link-external-link', ExternalLink)
    Vue.component('resource-navigation-link-nova-resource', NovaResource)
})
