async function getGitHubAvatar(username) {
    try {
        const response = await fetch(`https://api.github.com/users/${username}`);
        if (response.ok) {
            const data = await response.json();
            if (data.avatar_url) {
                return data.avatar_url;
            }
        }
    } catch (error) {
        console.error('Error fetching GitHub avatar:', error);
    }
    return 'https://media.discordapp.net/attachments/470953701985615897/1167110319395586048/flag-world-france.png?ex=654cef30&is=653a7a30&hm=302fe021e8a5f97edcfe80b19e9bcd0046584f77d3af9c6405229c6a4c766a0c&=&width=625&height=416';
}