<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Notification d'Évaluation</title>
</head>
<body>
    <h2 style="color: #0d6efd;">Bonjour {{ $data['nom'] }},</h2>

    <p>Vous avez été sélectionné(e) pour participer à l’évaluation intitulée <strong>{{ $data['titre'] }}</strong>.</p>

    <p>
        Merci de vous connecter à la plateforme <strong>Module Évaluation</strong> afin de compléter cette évaluation
        dans les délais impartis.
    </p>

    <p>Bonne chance et merci pour votre collaboration.</p>

    <br>

    <p>— L’équipe RH</p>
    <p style="font-size: 12px; color: #666;">
        Ceci est un message automatique. Veuillez ne pas y répondre.
        
    </p>
</body>
</html>
