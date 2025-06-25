<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import Swal from 'sweetalert2'

const evaluations = ref([])

onMounted(async () => {
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/evaluations')
    evaluations.value = response.data
  } catch (error) {
    Swal.fire({
      icon: 'error',
      title: 'Erreur',
      text: 'Impossible de récupérer les évaluations.',
    })
  }
})
</script>

<template>
  <div>
    <h2>Liste des évaluations</h2>
    <ul>
      <li v-for="eval in evaluations" :key="eval.id">
        {{ eval.titre }}
      </li>
    </ul>
  </div>
</template>
