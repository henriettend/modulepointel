<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import Swal from 'sweetalert2'

const evaluations = ref([])

// Charger les évaluations
const fetchEvaluations = async () => {
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
}

// Supprimer une évaluation
const deleteEvaluation = async (id) => {
  const confirm = await Swal.fire({
    title: 'Confirmer la suppression',
    text: "Cette évaluation sera supprimée définitivement.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Oui, supprimer',
    cancelButtonText: 'Annuler'
  })

  if (confirm.isConfirmed) {
    try {
      await axios.delete(`http://127.0.0.1:8000/api/evaluations/${id}`)
      Swal.fire('Supprimé !', 'L\'évaluation a été supprimée.', 'success')
      fetchEvaluations() // recharger la liste
    } catch (error) {
      Swal.fire('Erreur', 'Impossible de supprimer.', 'error')
    }
  }
}

onMounted(() => {
  fetchEvaluations()
})
</script>

<template>
  <div class="container mt-4">
    <h2 class="mb-3">Liste des évaluations</h2>

    <table class="table table-bordered table-hover">
      <thead class="table-light">
        <tr>
          <th>ID</th>
          <th>Titre</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="eval in evaluations" :k
ey="eval.id">
          <td>{{ eval.id }}</td>
          <td>{{ eval.titre }}</td>
          <td>
            <button class="btn btn-danger" @click="deleteEvaluation(eval.id)">
              Supprimer
            </button>
          </td>