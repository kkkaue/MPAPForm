export const pontuacaoConfig = {
  curriculum_vitae: {
    certificado_ensino_medio:{
      pontuacao: 0.00,
      limite: 0.00,
    },
    diploma_graduacao:{
      pontuacao: 0.00,
      limite: 0.00,
    },
    historico_escolar:{
      pontuacao: 0.00,
      limite: 0.00,
    },
    curso_curta_duracao: {
      pontuacao: 0.25,
      limite: 0.50,
    },
    curso_especializacao: {
      pontuacao: 0.25,
      limite: 0.50,
    },
    diploma_mestrado: {
      pontuacao: 0.75,
      limite: 1.50,
    },
    diploma_doutorado: {
      pontuacao: 2.00,
      limite: 2.00,
    },
    aprovacao_concurso: {
      pontuacao: 0.25,
      limite: 0.75,
    },
  },
  experiencia_profissional: {
    experiencia_sistema_politicas_garantidoras_direito: {
      pontuacao: 0.25,
      limite: 2.75,
    },
    assessor_juridico:{
      pontuacao: 0.25,
      limite: 2.75,
    },
    experiencia_metodologias_atendimento:{
      pontuacao: 0.25,
      limite: 1.00,
    },
    experiencia_libras:{
      pontuacao: 0.25,
      limite: 1.00,
    }
  },
  curriculum_vitae_estagiario:{
    comprovante_matricula: {
      calcularPontuacao: (variavel) => {
        if (variavel == 1) {
          return 2.00;
        } else if (variavel == 2) {
          return 1.00;
        } else if (variavel == 3) {
          return 0.50;
        } else {
          return 0.00;
        }
      },
      limite: 2.00,
    },
    experiencia_profissional: {
      calcularPontuacao: (variavel) => {
        if (variavel == 1) {
          return 2.00;
        } else if (variavel == 2) {
          return 1.00;
        } else if (variavel == 3) {
          return 0.00;
        } else {
          return 0.00;
        }
      },
      limite: 4.00,
    },
    trabalho_voluntario: {
      calcularPontuacao: (variavel) => {
        if (variavel == 1) {
          return 2.00;
        } else if (variavel == 2) {
          return 1.00;
        } else if (variavel == 3) {
          return 0.00;
        } else {
          return 0.00;
        }
      },
      limite: 4.00,
    }
  }
}