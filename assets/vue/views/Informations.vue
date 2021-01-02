<template>
  <div class="w-full bg-gray-200 min-h-window">
    <div class="py-2 px-4 mx-auto max-w-screen-xl sm:px-6 md:py-10 md:px-8">
      <div class="mx-auto max-w-3xl text-center">
        <h2
          class="mt-4 text-4xl font-extrabold tracking-tight text-gray-900 md:text-5xl"
        >
          Les informations
        </h2>
        <p class="mt-4 leading-7 text-gray-500 text-md md:text-lg">
          Retrouvez ici toutes les informations concernant l'appartemment en
          location.
        </p>
      </div>

      <Information
        v-for="category in categories"
        :key="category"
        :category="category"
      />
    </div>
  </div>
</template>

<script lang="ts">
import Information from "../components/front/blocks/Information.vue";
import Vue from "vue";

export default Vue.extend({
  name: "Informations",
  components: { Information },
  data() {
    return {
      categories: {
        description: {
          name: "Description de l'appartement",
          features: {
            feature1: {
              title: "Vue sur mer",
              desc:
                "Vous aurez toujours une vue magnifique sur la mer depuis la terrasse."
            },
            feature2: {
              title: "2 chambres",
              desc:
                "Idéal pour 2 couples ou pour un couple avec enfants. 1 lit double, et 2 lits jumeaux."
            },
            feature3: {
              title: "2 salles de bain",
              desc:
                "Les 2 salles de bain sont équipés de douche, de lavabo. L'un d'elles est équipée d'une baignoire."
            },
            feature4: {
              title: "Electroménager complet",
              desc: "Four, four micro-ondes, lave-vaisselle, machine à laver."
            },
            feature5: {
              title: "Wifi",
              desc:
                "L'accès à internet est compris dans le prix de la location."
            },
            feature6: {
              title: "Climatisation réversible",
              desc:
                "Possibilité de refroidir l'appartement, ainsi que de le chauffer."
            },
            feature7: {
              title: "Ascenseur",
              desc:
                "Accès à l'appartement via ascenceur. Accessible pour les fauteuils roulants."
            },
            feature8: {
              title: "Parking souterrain",
              desc: "1 place de parking est réservée pour l'appartement."
            },
            feature9: {
              title: "5 piscines à disposition",
              desc:
                "Toutes les piscines du domaine sont accessibles, la plus proche est à 200m."
            },
            feature10: {
              title: "Résidence sécurisée",
              desc:
                "Portail à l'entrée de la résidence, surveillé par un vigile 24h/24."
            }
          }
        },
        poi: {
          name: "Points d'intérêts",
          features: {
            feature1: {
              title: "Proximité de la plage",
              desc: "Seulement 200m vous séparent de la plage."
            },
            feature2: {
              title: "Proximité du port",
              desc: "Port de plaisance situé à 500m, accessible à pied."
            },
            feature3: {
              title: "Proximité des commerces",
              desc: "Boulangerie et épicerie accessibles à pied."
            }
          }
        },
        acces: {
          name: "Accès",
          features: {
            feature1: {
              title: "Duquesa Village",
              desc: "Résidence balnéaire sécurisée."
            },
            feature2: {
              title: "Proche aéroport",
              desc:
                "1h de route depuis l'aéroport pour être au bord des plages."
            },
            feature3: {
              title: "Location de voiture",
              desc: "Simplicité d'accès à un véhicule sans quitter l'aéroport."
            }
          },
          map: true
        }
      }
    };
  }
});
</script>
