{% extends 'base.php' %}

{% block title %}
	User {{ user.id }}
{% endblock %}

{% block body %}	
	<h3>{{ user.id }}</h3>
	<p>{{ user.name }}</p>
{% endblock %}